// Firebase 7, 8 et 9 en POO
import React, { useState, useEffect, useContext } from 'react'
import { FirebaseContext } from '../Firebase'

const Logout = () => {

    const firebase = useContext(FirebaseContext);

    const [checked, setChecked] = useState(false);

    useEffect(() => {
        if (checked) {
            //console.log("Déconnexion");
            firebase.signoutUser();
        }

    }, [checked, firebase]);

    const handleChange = event => {
        setChecked(event.target.checked);
    }

    return (
        <div className="logoutContainer">
            <label className="switch">
                <input
                    onChange={handleChange}
                    type="checkbox"
                    checked={checked}
                />
                <span className="slider round" data-tip="Déconnexion"></span>
            </label>
        </div>
    )
}

export default Logout
