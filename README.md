# YouTube fragment downloader

This app allows you to download fragments from YouTube videos no matter how long they are
without downloading full video to your PC.

## Cutting a fragment

To cut a fragment, you can call the `GET /api/v1/download` endpoint with 3 required query parameters:

- `url` - the video URL;
- `start` - the start time of your fragment;
- `end` - the start time of your fragment.

<br>
The time parameters can have one of the following formats:

- HH:mm:ss
- HH:mm:ss.SSS

The endpoint returns a `fileName` of the saved file if succeeded. Otherwise, it will return `error` with a message.
See the successful response example below:
```json
{
    "fileName": "12345678.mp4"
}
```

## Downloading a fragment

To download a fragment, you can call the `GET /api/v1/file` endpoint with 1 required `fileName` parameter returned from `GET /api/v1/download`

## Local setup

To set up the application, you have to start docker containers:
```bash
docker-compose up -d
```
Then you should enter the php container and install composer dependencies:
```bash
docker exec -it youtube-fr-dl-api bash
composer install
```
