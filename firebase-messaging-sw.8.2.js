// firebase-messaging-sw.js
self.addEventListener("notificationclick", function(event) {
  console.log('notification open');
  // log send to server
});

importScripts("https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.2.6/firebase-messaging.js");

firebase.initializeApp({
  apiKey: "AIzaSyBrIaOX0XAxjqdyelM5s5PeWDYExuIVktc",
  authDomain: "push-e386c.firebaseapp.com",
  projectId: "push-e386c",
  storageBucket: "push-e386c.appspot.com",
  messagingSenderId: "126413432349",
  appId: "1:126413432349:web:8e6e0ec3d8ea839d0588f4",
  measurementId: "G-52GYN1JV88"
});

const messaging = firebase.messaging();

// This will be called only once when the service worker is installed for first time.
self.addEventListener("activate", async (event) => {
  event.waitUntil(
    self.clients
      .matchAll({
        type: "window",
        includeUncontrolled: true,
      })
      .then((windowClients) => {
        const client = windowClients[0];

        messaging
          .getToken()
          .then((currentToken) => {
            console.log("Recovered token from messaging: ", currentToken);

            client.postMessage({
              source: "firebase-messaging-sw",
              currentToken: currentToken,
            });
          })
          .catch((err) => {
            console.log("An error occurred while retrieving token. ", err);
          });
      })
  );
});

