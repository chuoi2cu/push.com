importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');
/*Update this config*/
var config = {
    apiKey: "AIzaSyDYxHZFpvvZ-BDYwgoJh_vuKm2o_ez9eQc",
    authDomain: "vega-341604.firebaseapp.com",
    projectId: "vega-341604",
    storageBucket: "vega-341604.appspot.com",
    messagingSenderId: "631853284217",
    appId: "1:631853284217:web:f93fe81e904bba33b6cda8",
    measurementId: "G-HDSS8P85JY"
  };
  firebase.initializeApp(config);
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  //console.log(payload);
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle =  payload.data.title;
  var data = [];
  data['url'] = payload.data.click_action;
  const notificationOptions = {
    body: payload.data.body,
    icon: 'http://localhost/fcm-push/fcm-push/img/icon.png',
    data: data,
  };
  console.log(payload.data.click_action);
  self.registration.showNotification(notificationTitle, notificationOptions);

  self.addEventListener("notificationclick", function(event) {
    console.log(event);
    event.waitUntil(clients.openWindow(event.notification.data.url));
  });


});



// [END background_handler]