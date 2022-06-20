class Accordeon {
  constructor(conteneur) {
    this.conteneur = conteneur;
    this.titres = conteneur.getElementsByClassName("titre");
    this.texts = conteneur.getElementsByClassName("text");
    for (let i = 0; i < this.titres.length; i++) {
      this.titres[i].addEventListener("click", (e) => {
        this.afficher(i, e);
      });
    }
  }

  cacherShow(e) {
    let shows = this.conteneur.getElementsByClassName("show");
    for (let show of shows) {
      if (e.currentTarget.parentNode != show) {
        show.classList.remove("show");
      }
    }
  }

  afficherClick(i) {
    this.titres[i].parentNode.classList.toggle("show");
  }

  afficher(i, e) {
    this.cacherShow(e);
    this.afficherClick(i);
  }
}

let acc1 = new Accordeon(document.getElementById("acc1"));
acc1.afficher(1, null);
let acc2 = new Accordeon(document.getElementById("acc2"));
