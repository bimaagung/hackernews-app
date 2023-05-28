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

    .header {
      text-align: center;
      background-color: #ff6600;
      padding: 10px;
      margin-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      color: #fff;
      font-size: 28px;
      font-weight: bold;
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
      width: 300px;
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

    .card .total-comments, .card .time, .card .by, .card .descendant {
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
  <div class="header">
    <h1>Hacker News</h1>
  </div>
  <div class="search-container">
    <input type="search" id="search-input" placeholder="Search articles...">
  </div>
  <div class="sort-container">
    <select id="sort-select">
      <option value="all">All</option>
      <option value="24h">Last 24h</option>
      <option value="week">Past Week</option>
      <option value="month">Past Month</option>
    </select>
  </div>
  <div class="card-container">
    <div class="card">
      <i class="fas fa-arrow-up arrow"></i>
      <div class="content">
        <a href="https://example.com/article1" class="title">Article 1</a>
        <div class="metadata">
          <p class="url">example.com</p>
          <p class="total-comments"><i class="fas fa-comments"></i> 123</p>
        </div>
        <div class="metadata">
          <p class="by"><i class="fas fa-user"></i> John Doe</p>
          <p class="time"><i class="fas fa-clock"></i> 2 hours ago</p>
        </div>
      </div>
    </div>
    <div class="card">
      <i class="fas fa-arrow-up arrow"></i>
      <div class="content">
        <a href="https://example.com/article2" class="title">Article 2</a>
        <div class="metadata">
          <p class="url">example.com</p>
          <p class="total-comments"><i class="fas fa-comments"></i> 50</p>
        </div>
        <div class="metadata">
          <p class="by"><i class="fas fa-user"></i> Jane Smith</p>
          <p class="time"><i class="fas fa-clock"></i> 1 day ago</p>
        </div>
      </div>
    </div>
    <div class="card">
      <i class="fas fa-arrow-up arrow"></i>
      <div class="content">
        <a href="https://example.com/article3" class="title">Article 3</a>
        <div class="metadata">
          <p class="url">example.com</p>
          <p class="total-comments"><i class="fas fa-comments"></i> 87</p>
        </div>
        <div class="metadata">
          <p class="by"><i class="fas fa-user"></i> Mike Johnson</p>
          <p class="time"><i class="fas fa-clock"></i> 3 hours ago</p>
        </div>
      </div>
    </div>
  </div>

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

    sortSelect.addEventListener('change', function(event) {
      const sortValue = event.target.value;

      cards.forEach(function(card) {
        const time = card.querySelector('.time').textContent;
        const isVisible = shouldDisplayCard(sortValue, time);

        card.style.display = isVisible ? 'block' : 'none';
      });
    });

    function shouldDisplayCard(sortValue, time) {
      const currentDate = new Date();
      const cardDate = new Date(time);
      const timeDiff = currentDate - cardDate;
      const oneDay = 24 * 60 * 60 * 1000;
      const oneWeek = 7 * oneDay;
      const oneMonth = 30 * oneDay;

      if (sortValue === '24h') {
        return timeDiff <= oneDay;
      } else if (sortValue === 'week') {
        return timeDiff <= oneWeek;
      } else if (sortValue === 'month') {
        return timeDiff <= oneMonth;
      } else {
        return true;
      }
    }
  </script>
</body>
</html>
