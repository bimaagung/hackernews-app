<!DOCTYPE html>
<html>

<head>
    <title>Story Detail - Hacker News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f6f6ef;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            background-color: #ff6600;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .header h1 {
            color: #fff;
            font-size: 24px;
            margin: 0;
        }

        .back-btn {
            background-color: #ff5500;
            color: #fff;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #ff4400;
        }

        .story-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .story-container h2 {
            margin-bottom: 10px;
            color: #ff6600;
        }

        .story-container .meta {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
        }

        .story-container .meta span {
            margin-right: 10px;
        }

        .story-container .meta .icon {
            color: #888;
            margin-right: 5px;
        }

        .story-container .descendants {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
        }

        .story-container .descendants span {
            margin-right: 10px;
        }

        .story-container .descendants .icon {
            color: #888;
            margin-right: 5px;
        }

        .story-container .comments {
            margin-top: 20px;
        }

        .story-container .comment {
            margin-bottom: 20px;
        }

        .story-container .comment .meta {
            font-size: 12px;
            color: #888;
            margin-bottom: 5px;
        }

        .story-container .comment .text {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Story Detail</h1>
    </div>
    <div class="story-container">
        <h2>{{ $data['title'] }}</h2>
        <div class="meta">
            <span><i class="fas fa-user icon"></i> {{ $data['by'] }}</span>
            @php
                $timestamp = $data['time'];
                $currentTime = time();
                $timeDiff = $currentTime - $timestamp;
                
                if ($timeDiff < 60) {
                    $timeAgo = $timeDiff . ' seconds ago';
                } elseif ($timeDiff < 3600) {
                    $minutes = floor($timeDiff / 60);
                    $timeAgo = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
                } elseif ($timeDiff < 86400) {
                    $hours = floor($timeDiff / 3600);
                    $timeAgo = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
                } elseif ($timeDiff < 2592000) {
                    $days = floor($timeDiff / 86400);
                    $timeAgo = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
                } else {
                    $months = floor($timeDiff / 2592000);
                    $timeAgo = $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
                }
            @endphp
            <span><i class="fas fa-clock icon"></i> {{ $timeAgo }}</span>
            <span><i class="fas fa-chevron-up icon"></i> {{ $data['score'] }}</span>
            <span><i class="fas fa-sitemap icon"></i> {{ $data['descendants'] }}</span>
            <span><i class="fas fa-comments"></i>
                @if (!empty($data['comments']))
                    {{ count($data['comments']) }}
                @else
                    0
                @endif
            </span>

        </div>
        <div class="comments">
            @if (!empty($data['comments']))
                @foreach ($data['comments'] as $comment)
                    <div class="comment">
                        <div class="meta">
                            <span><i class="fas fa-user icon"></i> {{ $comment['by'] }}</span>
                            @php
                                $timestamp = $comment['time'];
                                $currentTime = time();
                                $timeDiff = $currentTime - $timestamp;
                                
                                if ($timeDiff < 60) {
                                    $timeAgoComment = $timeDiff . ' seconds ago';
                                } elseif ($timeDiff < 3600) {
                                    $minutes = floor($timeDiff / 60);
                                    $timeAgoComment = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDiff < 86400) {
                                    $hours = floor($timeDiff / 3600);
                                    $timeAgoComment = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDiff < 2592000) {
                                    $days = floor($timeDiff / 86400);
                                    $timeAgoComment = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
                                } else {
                                    $months = floor($timeDiff / 2592000);
                                    $timeAgoComment = $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
                                }
                            @endphp
                            <span><i class="fas fa-clock icon"></i> {{ $timeAgoComment }}</span>
                            <span><i class="fas fa-comments"></i>
                                @if ($comment['comments'] !== null && count($comment['comments']) > 0)
                                    @if (count($comment['comments']) > 1)
                                        <a
                                            href="{{ route('detail.index', ['id' => $comment['id']]) }}">{{ count($comment['comments']) }}</a>
                                    @else
                                        {{ count($comment['comments']) }}
                                    @endif
                                @else
                                    0
                                @endif
                            </span>
                        </div>
                        <div class="text">
                            <p>{{ $comment['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No comments available.</p>
            @endif
        </div>
    </div>
</body>

</html>
