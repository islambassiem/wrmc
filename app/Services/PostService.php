<?php

namespace App\Services;

use DOMDocument;
use DOMElement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public static function deleteUnusedFiles(string $body, string $sessionToken): string
    {
        preg_match_all('/<img[^>]+src="([^"]+)"/i', $body, $matches);
        $usedUrls = $matches[1];

        $tempUploads = DB::table('temp_uploads')->where('session_token', $sessionToken)->get();

        $idsToDelete = [];

        foreach ($tempUploads as $upload) {

            if (empty($upload->path)) {
                continue;
            }

            if (! \is_string($upload->path)) {
                continue;
            }

            $url = Storage::url($upload->path);

            $normalizedStorageUrl = parse_url($url, PHP_URL_PATH);
            $normalizedUsedUrls = array_map(fn ($u): string|false|null => parse_url($u, PHP_URL_PATH), $usedUrls);

            if (\in_array($normalizedStorageUrl, $normalizedUsedUrls)) {
                $newPath = str_replace('temp/', 'posts/', $upload->path);

                Storage::disk('public')->makeDirectory('posts');
                Storage::disk('public')->move($upload->path, $newPath);

                $newUrl = Storage::url($newPath);
                $body = str_replace($url, $newUrl, $body);

                $body = str_replace(
                    url($url),
                    url($newUrl),
                    $body
                );
            } else {
                Storage::disk('public')->delete($upload->path);
            }

            $idsToDelete[] = $upload->id;
        }

        DB::table('temp_uploads')->whereIn('id', $idsToDelete)->delete();

        session()->forget('upload_session_token');

        return $body;
    }

    /**
     * @return array<int, string>
     */
    public static function postImages(string $body): ?array
    {
        $dom = new DOMDocument;

        @$dom->loadHTML($body);

        $images = [];

        foreach ($dom->getElementsByTagName('img') as $img) {
            /** @var DOMElement $img */
            $src = $img->getAttribute('src');

            if ($src !== '') {
                $images[] = $src;
            }
        }

        return $images;
    }

    public static function createThumbnail(string $body): ?string
    {
        if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', $body, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
