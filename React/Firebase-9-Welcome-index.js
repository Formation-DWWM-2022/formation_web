// Firebase version 9
import React, { useState, Fragment, useEffect } from 'react';
import { onAuthStateChanged } from 'firebase/auth';
import { auth } from '../Firebase/firebaseConfig';
import { useNavigate } from 'react-router-dom';
import Logout from '../Logout'
import Quiz from '../Quiz'

const Welcome = props => {

    const navigate = useNavigate();

    const [userSession, setUserSession] = useState(null);

    useEffect(() => {
        const listener = onAuthStateChanged(auth, user => {
            user ? setUserSession(user) : navigate('/')
        })
        return listener();
    }, [])

    return userSession === null ? (
        <Fragment>
            <div className="loader"></div>
            <p className="loaderText">Loading ...</p>
        </Fragment>
    ) : (
        <div className="quiz-bg">
            <div className="container">
                <Logout />
                <Quiz />
            </div>
        </div>
    )
}

export default Welcome
