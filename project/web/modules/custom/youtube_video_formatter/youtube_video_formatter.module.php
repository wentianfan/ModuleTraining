<?php

/**
 * @file
 * Implements youtube_video_formatter_theme()
 */

 function youtube_video_formatter_theme($existing, $type, $theme, $path) {
    return [
        'youtube_video' => [
            'variables' => [
                'youtube_id' => NULL,
            ],
        ],
    ];
 }