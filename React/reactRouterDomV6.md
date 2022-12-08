# Note React Router Dom version 6

Dans la précédente vidéo, j'ai utilisé la version 5 du package react-router-dom.

Si vous souhaitez passer à la version 6, vous pouvez lancer npm install react-router-dom@6 à la racine de votre projet.

Ensuite, rendez-vous dans component/App/index.js pour mettre à jour la configuration de vos routes comme indiqué ci-dessous.

Notez qu'une section spécialement dédiée à cette version 6 ( "Update: React Router 6") est maintenant disponible tout en bas de cette formation. Elle contient plusieurs vidéos vous permettant une bonne maîtrise de cette nouvelle version ;-)

```js
import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom'
import Header from '../Header'
import Landing from '../Landing'
import Footer from '../Footer'
import Welcome from '../Welcome'
import Login from '../Login'
import Signup from '../Signup'
import ErrorPage from '../ErrorPage'
import '../../App.css';

function App() {
  return (
    <Router>
        <Header />

        <Routes>
          <Route path="/" element={<Landing />} />
          <Route path="/welcome" element={<Welcome />} />
          <Route path="/login" element={<Login />} />
          <Route path="/signup" element={<Signup />} />
          <Route path="*" element={<ErrorPage />} />
        </Routes>
 
        <Footer />
    </Router>
  );
}

export default App;
```
