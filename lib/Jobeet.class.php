<?php
class Jobeet
{
    /**
     * URL 文字列の正規化.
     *
     * 英数以外の文字を - に置き換え, 小文字に変換する.
     *
     * @param  string $text
     * @return string
     */
    public static function slugify($text)
    {
        $text = preg_replace('/\W+/', '-', $text);
        $text = strtolower(trim($text, '-'));
        return $text;
    }
}
