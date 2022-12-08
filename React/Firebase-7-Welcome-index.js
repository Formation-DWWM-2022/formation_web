// Firebase versions 7, 8 et "9" en POO
import React, { useState, Fragment, useContext, useEffect } from 'react'
import { FirebaseContext } from '../Firebase'
import Logout from '../Logout'
import Quiz from '../Quiz'

const Welcome = props => {

    const firebase = useContext(FirebaseContext);

    const [userSession, setUserSession] = useState(null);

    useEffect(() => {

        let listener = firebase.auth.onAuthStateChanged(user => {
            user ? setUserSession(user) : props.history.push('/');
        })

        return () => {
            listener()
        };
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
