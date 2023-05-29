<!DOCTYPE html>
<html>

<head>
    <title>Hacker News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f6f6ef;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ff6600;
            padding: 10px;
            margin-bottom: 20px;
        }

        .navbar h1 {
            margin: 0;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
        }

        .navbar .logout-btn {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="search"] {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            font-size: 16px;
            width: 640px;
        }

        .sort-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .sort-container select {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            font-size: 16px;
        }

        .card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            display: flex;
        }

        .card .arrow {
            color: orange;
            font-size: 20px;
            margin-right: 10px;
            align-self: center;
        }

        .card .content {
            flex-grow: 1;
        }

        .card .title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            text-decoration: none;
        }

        .card .title:hover {
            text-decoration: underline;
        }

        .card .metadata {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .card .metadata p {
            color: #888;
            font-size: 14px;
            margin: 0;
        }

        .card .metadata i {
            margin-right: 5px;
        }

        .card .total-comments,
        .card .time,
        .card .by,
        .card .descendant {
            display: flex;
            align-items: center;
        }

        .card .total-comments i:before,
        .card .time i:before,
        .card .by i:before,
        .card .descendant i:before {
            font-family: "Font Awesome 5 Free";
        }

        .card .total-comments i:before {
            content: "\f086";
        }

        .card .time i:before {
            content: "\f017";
        }

        .card .by i:before {
            content: "\f007";
        }

        .card .descendant i:before {
            content: "\f0e6";
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1>Hacker News</h1>
        @auth
            <form action="{{ route('logout.perform') }}" method="GET">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @endauth
    </div>
    <div class="search-container">
        <input type="search" id="search-input" placeholder="Search articles...">
    </div>
    <div class="sort-container">
    </div>
    <div class="card-container">
        @foreach ($items as $item)
            @php
                $url = 'https://www.masteringemacs.org/article/how-to-get-started-tree-sitter';
                $parsedUrl = parse_url($url);
                $trimmedUrl = $parsedUrl['host'];
                
                $timestamp = $item['time'];
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

            <div class="card">
                <i class="fas fa-arrow-up arrow"></i>
                <div class="content">
                    <a href="{{ route('detail.index', ['id' => $item['id']]) }}" class="title">{{ $item['title'] }}</a>
                    <div class="metadata">
                        <p class="url">{{ $trimmedUrl }}</p>
                        <p class="total-comments"><i class="fas fa-comments"></i>{{ $item['total_comment'] }}</p>
                    </div>
                    <div class="metadata">
                        <p class="by"><i class="fas fa-user"></i> {{ $item['by'] }}</p>
                        <p class="time"><i class="fas fa-clock"></i>{{ $timeAgo }}</p>
                    </div>
                </div>
            </div>
        @endforeach


        <script>
            const searchInput = document.getElementById('search-input');
            const sortSelect = document.getElementById('sort-select');
            const cards = document.querySelectorAll('.card');

            searchInput.addEventListener('input', function(event) {
                const searchTerm = event.target.value.toLowerCase();

                cards.forEach(function(card) {
                    const title = card.querySelector('.title').textContent.toLowerCase();

                    if (title.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        </script>
</body>

</html>
