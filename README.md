# LINE Bot Test Helper

[LINE Bot SDK](https://github.com/line/line-bot-sdk-php)を使って作成したプログラムにおいて、メッセージの受送信をテストするためのライブラリです。

## Components
### StockHTTPClient
リクエストをそのままインスタンス内にストックするため、
このHTTPClientを使ってLineBotクラスを生成し、replyやpushを含む処理を実行した後、送信されたメッセージの確認が可能です。

### WebhookEvent
LINEから送信されるメッセージリクエストのBodyやSignatureを作成することができます。
「XXXというテキストメッセージが送信されたら」といったテストを行うことが可能です。

## Requirements
PHP 5.4 or later

## License
Apache License version 2.0