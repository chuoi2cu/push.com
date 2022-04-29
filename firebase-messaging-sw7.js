importScripts("https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.3.0/firebase-messaging.js");

// The contents of firebaseConfig can be obtained from the firebase console.
var firebaseConfig = {
  apiKey: "AIzaSyDYxHZFpvvZ-BDYwgoJh_vuKm2o_ez9eQc",
  authDomain: "vega-341604.firebaseapp.com",
  projectId: "vega-341604",
  storageBucket: "vega-341604.appspot.com",
  messagingSenderId: "631853284217",
  appId: "1:631853284217:web:f93fe81e904bba33b6cda8",
  measurementId: "G-HDSS8P85JY"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

// When a notification is received, the push event is called.
self.addEventListener('push', function (event) {
  console.log(event)
  let messageTitle = "MESSAGETITLE"
  let messageBody = "MESSAGEBODY"
  let messageTag = "MESSAGETAG"
  let data = [];
  data['url'] = "dantri.com";
  const notificationPromise = self.registration.showNotification(
    messageTitle,
    {
      body: messageBody,
      tag: messageTag,
      onclick: "google.com",
      data: data
    });
    
  event.waitUntil(notificationPromise);

}, false)

// event click
self.addEventListener("notificationclick", function(event) {
  console.log(event);
  event.waitUntil(clients.openWindow("http://google.com"));
});


// If the web application is in the background, setBackGroundMessageHandler is called.
messaging.setBackgroundMessageHandler(function (payload) {
  console.log(payload);
  console.log("backgroundMessage")

  let messageTitle = "MESSAGETITLE2"
  let messageBody = "MESSAGEBODY"

  return self.registration.showNotification(
    messageTitle,
    {
      body: messageBody,
      tag: messageTag
    });
});
