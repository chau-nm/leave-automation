import { initializeApp } from "https://www.gstatic.com/firebasejs/12.10.0/firebase-app.js";
import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/12.10.0/firebase-messaging.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDZv-GEV3dWdKpsfy_2OxeLGTby1slA6XA",
    authDomain: "leave-automation-8104a.firebaseapp.com",
    projectId: "leave-automation-8104a",
    storageBucket: "leave-automation-8104a.firebasestorage.app",
    messagingSenderId: "128536706070",
    appId: "1:128536706070:web:22b93ff9884c0aa3e0c937",
    measurementId: "G-8WYF3L4XGP"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

const VAPID = "BBeLxo1afxtbbJlliRuytw3Yyad0C3WtBZUWSbVzqJUi5XRFrT9IjrwPZMgd2eORb6BQ6iKDcl_cYx9UhKqZIbA";

function registerApp() {
    return getToken(messaging, { vapidKey: VAPID })
        .then((currentToken) => {
            if (currentToken) {
                return currentToken;
            } else {
                throw new Error("No registration token available");
            }
        });
}

export { registerApp };
