<!DOCTYPE html>
<html>
<header>
    <title>push notification</title>

</header>
<body>
    push notification
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
        import { getMessaging, getToken, onMessage   } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging.js"
        
        self.addEventListener('notificationclick', function (event) {
            console.debug('SW notification click event', event)
        })
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
        
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyBrIaOX0XAxjqdyelM5s5PeWDYExuIVktc",
            authDomain: "push-e386c.firebaseapp.com",
            projectId: "push-e386c",
            storageBucket: "push-e386c.appspot.com",
            messagingSenderId: "126413432349",
            appId: "1:126413432349:web:8e6e0ec3d8ea839d0588f4",
            measurementId: "G-52GYN1JV88"
        };
        
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        const messaging = getMessaging();
        getToken(messaging, { vapidKey: 'BJgZnEVMZrRl0TvAe3wBZFS5hld-TqKM7RV5juMqZ2Tmre4iW2ZP2YXLBJerZ1sRLwEFB2lPwmm7BZop9YEbjhM' }).then((currentToken) => {
            if (currentToken) {
                // Send the token to your server and update the UI if necessary
                // ...
                console.log(currentToken);
            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                // ...
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            // ...
        });
        
        onMessage(messaging, (payload) => {
            console.log('Message received. ', payload);
            let notificationTitle = "hi'22" + payload.data.title;
            let notificationOptions = {
                body: payload.data.body,
                icon: payload.data.icon,
                image:  payload.data.image,
                //click_action: "http://google.com",
            };
            if (!("Notification" in window)) {
                console.log("This browser does not support system notifications.");
            } else if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                var notification = new Notification(notificationTitle,notificationOptions);
                notification.onclick = function(event) {
                    console.log(payload);
                    event.preventDefault();
                    window.open(payload.data.image , '_blank');
                    notification.close();
                }
            }
        });

    </script>
</body>
</html>