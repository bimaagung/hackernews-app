## HackerNews App

The HackerNews App is a web application built with Laravel. It provides a user-friendly interface to browse, read, and interact with news articles from the HackerNews platform. The app utilizes the HackerNews API to fetch and display the latest news stories, along with their associated comments and discussions.

**For the HackerNews Service built with Go and explanation about Api Documentation , please visit the [HackerNews Service repository](https://github.com/bimaagung/hackernews-service.git).**

### Screenshots

Here are some screenshots of the HackerNews App:

![Home Page](home.png)
*The home page displays the top news stories from HackerNews.*

## Documentation: Integration of Laravel Framework and Golang Service

This documentation provides an overview of how the HackerNews application integrates the Laravel framework with a Golang service for data processing. The integration is done using the HTTPS protocol, and the Golang service implements caching to enhance the retrieval of data from the HackerNews API.

### Architecture Overview

The HackerNews application follows a microservices architecture, with the frontend built using Laravel and the data processing handled by a Golang service. Here's an overview of the integration:

1. The Laravel application serves as the user interface, providing a user-friendly interface to browse, read, and interact with HackerNews articles and discussions.

2. When a user interacts with the application, Laravel sends requests to the Golang service for data processing. These requests include fetching top stories, story, comments from the HackerNews API.

3. The Golang service acts as a middleware between the Laravel application and the HackerNews API. It handles the communication with the API, performs data processing tasks, and caches the retrieved data.

4. To enhance performance, the Golang service implements caching using a caching mechanism such as Memcached. This caching layer helps speed up data retrieval from the HackerNews API by storing frequently accessed data locally.

5. The Golang service retrieves data from the HackerNews API and stores it in the cache. Subsequent requests for the same data can be served directly from the cache, reducing the response time and the load on the HackerNews API.

6. The Golang service then sends the processed data back to the Laravel application, which renders it for display to the user.

### Integration Steps

To integrate the Laravel framework with the Golang service, follow these steps:

1. Set up the Laravel application by following the installation instructions provided in the previous section. Make sure the Laravel application is configured to communicate with the Golang service via HTTPS.

2. Set up the Golang service by cloning the repository from [https://github.com/bimaagung/hackernews-service.git](https://github.com/bimaagung/hackernews-service.git).

3. Configure the Golang service to connect to the HackerNews API. Update the necessary configuration files with the API credentials and endpoints.

4. Implement the caching mechanism in the Golang service using a caching library like Memcached. Configure the caching options according to your preferences and requirements.

5. Integrate the Golang service into the Laravel application by making HTTP requests to the Golang service for data processing. Use the appropriate endpoints and payloads as defined in the Golang service's API documentation.

6. Handle the responses from the Golang service in the Laravel application and render the data to the user interface.

## Design Decision

For the Hackernews service built using Golang, I decided to implement the clean architecture. This decision was based on the fact that clean architecture provides a clear and organized structure, making it easy to scale and maintain the code. Clean architecture also enables the separation of business logic, infrastructure, and the use of the dependency inversion principle.

In the case of the Laravel application, I chose to use a simpler architecture, focusing on the existing MVC (Model-View-Controller) pattern provided by Laravel. This approach allows for faster and simpler development for this project.

## Challenges Faced

1. Dealing with a large and continuous data API required an efficient approach. To address this, I implemented asynchronous handling in Golang, allowing the application to fetch data faster.

2. One challenge was improving response performance using caching. I opted to use Memcached as the caching solution for this project. However, there were challenges in properly configuring and managing the cache to ensure consistent and accurate cached data.

3. Another challenge faced was the tight deadline for this project. In tackling this challenge, I focused on prioritizing and ensuring that core features functioned well within the given timeframe.

## Potential Improvements

1. One potential improvement is to switch the communication protocol from HTTP to gRPC. gRPC provides lower latency compared to HTTP and enables more efficient communication between services.

2. To enhance caching management, considering the use of Redis as the caching solution. Redis has built-in clustering features, allowing for horizontal data distribution across multiple Redis nodes. This can improve cache scalability and performance.

Through careful design evaluation, overcoming challenges faced, and exploring potential solution improvements, this project can continue to be developed and enhanced to deliver a better and more efficient application.
