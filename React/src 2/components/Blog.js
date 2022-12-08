import React from 'react';
import { fakeArticleGenerator } from "../data/articles";

function Blog() {

  const articleArray = fakeArticleGenerator();
  console.table(articleArray);

  return (
    <>
    <div className="container">
      <header className="blog-header lh-1 py-3">
        <div className="row flex-nowrap justify-content-between align-items-center">
          <div className="col-4 pt-1">
            <a className="link-secondary" href="#">S'abonner</a>
          </div>
          <div className="col-4 text-center">
            <a className="blog-header-logo text-dark" href="#">Nos Articles</a>
          </div>
          <div className="col-4 d-flex justify-content-end align-items-center">
            <a className="link-secondary" href="#" aria-label="Search">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" className="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
            </a>
            <a className="btn btn-sm btn-outline-secondary" href="#">S'inscrire</a>
          </div>
        </div>
      </header>

      <div className="nav-scroller py-1 mb-2">
        <nav className="nav d-flex justify-content-between">
          <a className="p-2 link-secondary" href="#">Monde</a>
          <a className="p-2 link-secondary" href="#">France</a>
          <a className="p-2 link-secondary" href="#">Technologie</a>
          <a className="p-2 link-secondary" href="#">Design</a>
          <a className="p-2 link-secondary" href="#">Culture</a>
          <a className="p-2 link-secondary" href="#">Business</a>
          <a className="p-2 link-secondary" href="#">Politique</a>
          <a className="p-2 link-secondary" href="#">Opinion</a>
          <a className="p-2 link-secondary" href="#">Science</a>
          <a className="p-2 link-secondary" href="#">Santé</a>
          <a className="p-2 link-secondary" href="#">Mode</a>
          <a className="p-2 link-secondary" href="#">Voyages</a>
        </nav>
      </div>
    </div>

    <main className="container">
      <div className="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div className="col-md-6 px-0">
          <h1 className="display-4 fst-italic">Lorem ipsum, dolor sit amet consectetur</h1>
          <p className="lead my-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          <p className="lead mb-0"><a href="#" className="text-white fw-bold">Continuer la lecture...</a></p>
        </div>
      </div>



      <div className="row g-5">
        <div className="col-md-8">
          <h3 className="pb-4 mb-4 fst-italic border-bottom">
          Lorem ipsum, dolor sit amet
          </h3>

          <img
            src="https://cdn.pixabay.com/photo/2016/04/05/00/21/vw-1308501_1280.jpg"
            className="img-fluid"
            alt="Responsive image"
          />
          <hr />

          {/* Nos Articles */}
          {
            articleArray.map( article => (
              <article className="blog-post" key={article.id}>
                  <h2 className="blog-post-title mb-1">{article.title}</h2>
                  <p className="blog-post-meta">January {article.id}, 2021 par <a href="#">DonkeyGeek</a></p>
                  <img
                      src={article.img}
                      className="img-fluid"
                      alt={article.title} />
                  <p>{article.text}</p>
                  <p>{article.text}</p>
                  <p>{article.text}</p>
                  <p>{article.text}</p>
              </article>
            ))
          }

          <nav className="blog-pagination" aria-label="Pagination">
            <a className="btn btn-outline-primary rounded-pill" href="#">Ancien</a>
            <a className="btn btn-outline-secondary rounded-pill disabled">Récent</a>
          </nav>

        </div>

        <div className="col-md-4">
          <div className="position-sticky" style={{top: "2rem"}}>
            <div className="p-4 mb-3 bg-light rounded">
              <h4 className="fst-italic">À propos de</h4>
              <p className="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div className="p-4">
              <h4 className="fst-italic">Archives</h4>
              <ol className="list-unstyled mb-0">
                <li><a href="#">Mars 2021</a></li>
                <li><a href="#">Avril 2021</a></li>
                <li><a href="#">Janvier 2021</a></li>
                <li><a href="#">Décembre 2020</a></li>
                <li><a href="#">Novembre 2020</a></li>
                <li><a href="#">Octobre 2020</a></li>
                <li><a href="#">Septembre 2020</a></li>
                <li><a href="#">Aout 2020</a></li>
                <li><a href="#">Juillet 2020</a></li>
                <li><a href="#">Juin 2020</a></li>
                <li><a href="#">Mai 2020</a></li>
                <li><a href="#">Avril 2020</a></li>
              </ol>
            </div>

            <div className="p-4">
              <h4 className="fst-italic">Suivez-nous</h4>
              <ol className="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    </main>

    <footer className="blog-footer">
      <p><a href="https://getbootstrap.com/">Template via Bootstrap</a></p>
      <p><a href="#">Back to top</a></p>
    </footer>

    </>
  )
}

export default Blog
