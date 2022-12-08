// Firebase 9
import React, { useState, useEffect } from 'react';
import { signOut } from "firebase/auth";
import { auth } from '../Firebase/firebaseConfig';
import { useNavigate } from 'react-router-dom';

const Logout = () => {

    const navigate = useNavigate();

    const [checked, setChecked] = useState(false);

    useEffect(() => {
        if (checked) {
            //console.log("Déconnexion");
            signOut(auth).then(() => {
                console.log("Vous êtes déconnecté");
                setTimeout(() => {
                    navigate('/')
                }, 1000);
            }).catch((error) => {
                console.log("Oups, nous avons une erreur!")
            });
        }

    }, [checked]);

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
