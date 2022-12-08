// Firebase v9
import { initializeApp } from 'firebase/app';
import { getAuth } from "firebase/auth";

const config = {
    apiKey: "AIzaSyBME-o0-PFMgluMmLZ3jAjt22anDmIuFIw",
    authDomain: "marvel-quiz-update.firebaseapp.com",
    projectId: "marvel-quiz-update",
    storageBucket: "marvel-quiz-update.appspot.com",
    messagingSenderId: "987509257589",
    appId: "1:987509257589:web:6e5048022ff5f16b0c0f3c"
};

const app = initializeApp(config);
export const auth = getAuth(app);
