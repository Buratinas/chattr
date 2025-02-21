# chattr
Chat application tech challenge

## Setup

Quick setup (implied):
- Clone the repository and visit the project directory.
- Run `composer install`
- Run `bin/console doctrine:database:create`
- Run `bin/console doctrine:migrations:migrate -n`
- `cd public && php -S localhost:8000`

Open localhost:8000 to see the application.

The endpoints that are available in the application are:
- `/register` - Register a new user.
- `/login` - Login a user.
- `/channel` - List all channels.
- `/channel/{id}` - Show messages in a channel.
- `/` - Home page, currently shows general channel messages.


## Challenge

Requested extra features and changes:
- We would like to see channels, which can be public, private and between multiple people or only one.
- Right now everybody sees all messages that are being sent, make it so that only messages are visible in the channels that you are in or when someone sends you a direct message.
-  Being able to create a channel and leave them.
- Provide a detailed idea on how you would allow attachments to also be sent with the message.
- Make sure we also see how its stored in the database.

## Solution

Things added for the solution:
- Channels can be created.
- Users can be registered and logged in.
- Messages are sent by user are assigned the user and the channel.
- Only messages in the channel are shown.

Things to be added:
- Attachments can be added to messages. This can be done by adding using Symfony example https://symfony.com/doc/current/the-fast-track/en/14-form.html#uploading-files
- Sending direct messages requires a small change to either create a private channel between them or to send a message directly,
  but that requires and update to the message entity to also include recipient.
- Joining a channel can be done by adding a button next to channel list that allows user to join a channel. Clicking the button would add him to the users of the channel.
- Leaving a channel can be done by adding a button next to channel list that allows user to leave a channel. Clicking the button would remove him from the users of the channel.
- Sending notifications can be done following this example https://symfony.com/doc/current/notifier.html#creating-sending-notifications

Other potential improvements that can be done:
- Add a user profile page that shows the user's channels and messages.
- Improve UI/UX by adding more styling and animations.
- Adding tests to ensure the application works as expected.
- Adding php application to docker-compose to run the application in a container with other services.
- Switching to separate frontend and backend applications to allow for more flexibility and scalability.
  - The frontend can be built using React, Vue, or Angular.
  - The backend can be built using Symfony/API Platform as an API.
