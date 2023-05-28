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
    <h2>Story Title</h2>
    <div class="meta">
      <span><i class="fas fa-user icon"></i> Author</span>
      <span><i class="fas fa-clock icon"></i> Time</span>
      <span><i class="fas fa-chevron-up icon"></i> Score</span>
    </div>
    <div class="descendants">
      <span><i class="fas fa-sitemap icon"></i> Descendants</span>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum aliquet venenatis. Vestibulum eleifend, est nec consequat suscipit, turpis dui varius enim, a eleifend mauris felis non ex.</p>
    <div class="comments">
      <div class="comment">
        <div class="meta">
          <span><i class="fas fa-user icon"></i> Comment Author</span>
          <span><i class="fas fa-clock icon"></i> Comment Time</span>
        </div>
        <div class="text">
          <p>Comment text goes here.</p>
        </div>
      </div>
      <div class="comment">
        <div class="meta">
          <span><i class="fas fa-user icon"></i> Comment Author</span>
          <span><i class="fas fa-clock icon"></i> Comment Time</span>
        </div>
        <div class="text">
          <p>Comment text goes here.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
