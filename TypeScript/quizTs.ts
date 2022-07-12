class Quiz {
    private _index: number = 0;
    private score: number = 0;

    constructor(
        private name: string,
        private questions: Question[]
    ) {}

    get index() {
        return this._index;
    }
    
    render() {
        this.currentQuestion().render();
    }

    next() {
        this._index++;
        this.updateProgressBar();

        if(this._index >= this.questions.length){
            this.showResult();
        } else {
            this.render();
        }
    }

    updateScore(isRightAnswer: boolean): void {
        if (isRightAnswer) this.score++;
    }

    showResult(): void {
        const isWin = this.score > (this.questions.length / 2);
        quizTitle.innerText = (isWin) ? "Bien ouéj !" : "Aouch !";
        answersList.innerHTML = "";
        resultEl.classList.add(isWin ? "win" : "lose");
        scoreEl.innerText = this.score.toString();
        maxscoreEl.innerText = this.questions.length.toString();
    }

    reset(): void {
        this.score = 0;
        this._index = 0;
        this.render();
        this.updateProgressBar();
        resultEl.classList.remove('win');
        resultEl.classList.remove('lose');
    }

    currentQuestion(): Question {
        return this.questions[this._index];
    }

    updateProgressBar(): void {
        const progress = (this._index / this.questions.length) * 100;
        loadBar.style.width = progress + "%";
        loadBar.style.backgroundColor = (progress > 50) ? "teal" : "orange";
    }


}

class Question {
    constructor(
        private name: string,
        private answers: Answer[]
    ) {}

    render() {
        quizTitle.innerText = "Q" + (quiz.index + 1 ) + ": " + this.name;
        answersList.innerHTML = "";
        this.answers.forEach(answer => {
            answersList.append(answer.render());
        });
    }
}

class Answer {
    constructor(
        private text: string,
        private isCorrect: boolean = false
    ) {}

    render() {
        const answerEl = document.createElement('li');
        answerEl.classList.add('answer');
        answerEl.innerText = this.text;
        answerEl.addEventListener('click', (e) => {
            quiz.updateScore(this.isCorrect);
            quiz.next();
        });
        return answerEl;
    }

}

const quiz = new Quiz('Mon Quiz', [
    new Question("Comment s'appelle Michel ?", [
        new Answer("Bahh...Michel", true),
        new Answer("Miiiiiichel"),
        new Answer("Et oui !"),
        new Answer("Qui ?"),
    ]),
    new Question("Quel est le meilleur Final Fantasy ?", [
        new Answer("Le VII", true),
        new Answer("Le 7"),
        new Answer("Le sept"),
        new Answer("Les cêpes"),
    ]),
    new Question("Comment se prononce Fallout ?", [
        new Answer("Phal Aout"),
        new Answer("Filou"),
        new Answer("Фаллаут"),
        new Answer("Fallout", true),
    ]),
    new Question("J'ai faim", [
        new Answer("Oui"),
        new Answer("Non"),
        new Answer("Il est midi !", true),
        new Answer("Tu es gros et je te juge"),
    ]),
    new Question("Un développeur Weeb est...", [
        new Answer("Une personne exeptionnelle"),
        new Answer("Un cosplayer fan de licornes", true),
        new Answer("Un problème"),
    ]),
    new Question("Est-il est vrai que", [
        new Answer("Oui"),
        new Answer("Non"),
        new Answer("Quoi"),
        new Answer("Mais ce quiz n'a aucun sens !", true),
    ]),
]);

//DOM
const quizEl = document.querySelector('#quiz') as HTMLElement;
const quizTitle = quizEl.querySelector('h3') as HTMLElement;
const answersList = quizEl.querySelector('ul') as HTMLElement;
const resetBtn = quizEl.querySelector('button') as HTMLElement;
const loadBar = quizEl.querySelector('#load-progress') as HTMLElement;
const resultEl = quizEl.querySelector('#result') as HTMLElement;
const scoreEl = resultEl.querySelector('#score') as HTMLElement;
const maxscoreEl = resultEl.querySelector('#maxscore') as HTMLElement;


resetBtn.addEventListener('click', (e) => {
    quiz.reset();
});
//Init
quiz.render();