# Exercice 5 - CSS Flexbox
## Q1
``` css
section {
  display:flex;
}
```

## Q1.2
``` css
section{
  display:flex;
  flex-wrap:wrap;
}

section div{
  width:25%;
}
```

## Q1.3
``` css
section{
  display:flex;
  flex-wrap:wrap;
  width:95%;
  margin-left:auto;
  margin-right:auto;
  justify-content:space-between;
  align-items:center;
  align-content:center;
}

section div{
  height:500px;
  width:24%;
  margin-bottom:10px;
  margin-top:10px;
  display:flex;
  align-items:center;
  justify-content:center;
}
```

## Q2
``` css
section{
  display:flex;
  flex-wrap:wrap;
  width:95%;
  margin-left:auto;
  margin-right:auto;
  justify-content:space-between;
  align-items:center;
  align-content:center;
}

section div{
  height:500px;
  width:24%;
  margin-bottom:10px;
  margin-top:10px;
  display:flex;
  align-items:center;
  justify-content:center;
}

section div:nth-child(5){
  width:100%;
}
```

## Q2.2
``` css
section{
  display:flex;
  flex-wrap:wrap;
  width:95%;
  margin-left:auto;
  margin-right:auto;
  justify-content:space-between;
  align-items:center;
  align-content:center;
}

section div{
  height:500px;
  width:24%;
  margin-bottom:10px;
  margin-top:10px;
  display:flex;
  align-items:center;
  justify-content:center;
}

section div:nth-child(5){
  width:100%;
}

@media(max-width:1024px){
  section div{
    height:300px;
    width:49%;
  }
}
```

## Q2.3
``` css
section{
  display:flex;
  flex-wrap:wrap;
  width:95%;
  margin-left:auto;
  margin-right:auto;
  justify-content:space-between;
  align-items:center;
  align-content:center;
}

section div{
  height:500px;
  width:24%;
  margin-bottom:10px;
  margin-top:10px;
  display:flex;
  align-items:center;
  justify-content:center;
}

section div:nth-child(5){
  width:100%;
}

@media(max-width:1024px){
  section div{
    height:300px;
    width:49%;
  }
}

@media(max-width:600px){
  section div{
    height:200px;
    width:100%;
  }
}
```

## Q3
``` css
section{
  display:flex;
  align-items:center;
  justify-content:center;
}

section div{
  margin:10px;
  width:200px;
  height:200px;
  display:flex;
  align-items:center;
  justify-content:center;
}
```

## Q4
``` css
section {
  height: 100vh; /* ne pas éditer cette ligne */
  /*height:1000px;*/
  display:flex;
  flex-wrap:wrap;
  flex-direction:column;
  align-items:stretch;
  align-content:stretch;
  width:95%;
  margin-left:auto;
  margin-right:auto;
  
}

section div{
  width:calc(33% - 20px);
  height:calc(25% - 20px);
  margin:10px;
  display:flex;
  align-items:center;
  justify-content:center;
}

section div:last-child{
  height:100%;
}
```

## Q5
``` css
ul{
  display:flex;
  align-items:center;
  justify-content:center;
  height:80px;
  width:100%;
}

ul li{
  flex:1;
  height:50px
}

ul li a{
  display:block;
  width:100%;
  height:100%;
}
```

## Q5.2
``` css
ul{
  display:flex;
  align-items:center;
  justify-content:center;
  height:80px;
  width:100%;
}

ul li{
  flex:1;
  width:100%;
  height:50px;
}

ul li a{
  display:block;
  width:100%;
  height:100%;
}

@media(max-width:600px){
  ul{
    flex-direction:column;
    height:auto;
  }
}
```

## Q5.3
``` css
ul{
  display:flex;
  align-items:center;
  justify-content:center;
  height:80px;
  width:100%;
}

ul li{
  flex:1;
  width:100%;
}

ul li:hover{
  height:80px;
}

ul li:hover a{
  line-height: 80px;
}

ul li a{
  display:block;
  width:100%;
  height:100%;
}

@media(max-width:600px){
  ul{
    flex-direction:column;
    height:auto;
  }
}
```

## Q6
``` css
html, body{
  height:100%;
  min-height:500px;
}
main{
  display:flex;
  height:calc(100% - 160px);

}

main nav{
  width:200px;
}

main article{
  flex:1;
}
```

## Q6.2
``` css
html, body{
  height:100%;
  min-height:500px;
}
main{
  display:flex;
  height:calc(100% - 160px);

}

main nav{
  width:200px;
}

main article{
  flex:1;
}

@media(max-width:600px){
  main{
    flex-direction:column;
  }
  main article{
    order:1;
  }
  main nav{
    width:100%;
    order:2;
  }
}
```

# Exercice 6 - CSS Grid
## Q1 Grille basique
``` css
.container {
  display: grid;
  grid-template-columns: 300px 300px;
}
```

## Q2 Grille basique avec gestion des lignes
``` css
.container {
  display: grid;
  grid-template-columns: 300px 300px;
  grid-template-rows: 200px 200px 200px;
}
```

## Q3 Grille complexe
``` css
.container {
  display: grid;
  grid-template-columns: 200px 1fr 200px;
  grid-template-rows: min-content 1fr min-content;
  height:300px;
}

header{
  grid-column: 1 / span 3;
  grid-row: 1;
}

footer {
  grid-column: 1/ span 3;
  grid-row:3;
}
```

## Q4 Grille complexe avec responsive
``` css
.container {
  display: grid;
  grid-template-columns: 200px 1fr 200px;
  grid-template-rows: min-content 1fr min-content;
  height:300px;
}

header{
  grid-column: 1 / span 3;
  grid-row: 1;
}

footer {
  grid-column: 1/ span 3;
  grid-row:3;
}

@media (max-width: 640px) {
  .container{
    grid-template-columns: 1fr;
    grid-template-rows: min-content;
  }
  
  header{
    grid-column:1;
  }
  
  footer{
    grid-column:1;
    grid-row:5;
  }
}
```

## Q5 Grille complexe, adaptation au contenu
``` css
.container {
  display: grid;
  grid-template-columns: 200px 1fr 200px;
  grid-template-rows: min-content 1fr min-content;
  height:300px;
}

header{
  grid-column: 1 / span 3;
  grid-row: 1;
}

nav, aside{
  align-self: start;
}

footer {
  grid-column: 1/ span 3;
  grid-row:3;
}

@media (max-width: 640px) {
  .container{
    grid-template-columns: 1fr;
    grid-template-rows: min-content;
  }
  
  header{
    grid-column:1;
  }
  
  footer{
    grid-column:1;
    grid-row:5;
  }
}
```

# Exercice 7 - CSS 3D
## Q1
``` html
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Exercice 12</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
		<div class="block">
			<div class="front">
				<p>Je suis le texte de la face avant de la carte 1</p>
			</div>
			<div class="back">
				<p>Je suis le texte de la face arrière de la carte 1</p>
			</div>
		</div>
		<div class="block">
			<div class="front">
				<p>Je suis le texte de la face avant de la carte 2</p>
			</div>
			<div class="back">
				<p>Je suis le texte de la face arrière de la carte 2</p>
			</div>
		</div>
		<div class="block">
			<div class="front">
				<p>Je suis le texte de la face avant de la carte 3</p>
			</div>
			<div class="back">
				<p>Je suis le texte de la face arrière de la carte 3</p>
			</div>
		</div>
	</div>
</body>
</html>
```

``` css
html,body {
	width:100%;
	height:100%;
	margin:0;
	padding:0;
	font-family:Arial, sans-serif;
	font-size:12pt;
}


.container{
	padding-top:50px;
	display:flex;
	justify-content: space-around;
}

.container>.block{
	position:relative;
	flex-basis:200px;
	height:400px;
}

.block>.front, .block>.back{
	position:absolute;
	width:100%;
	height:100%;
	backface-visibility: hidden;
}

.block>.front{
	background-color:#F6E847;
}

.block>.back{
	background-color:#6FB9A3;
	transform: rotateY(180deg);
}

.front p, .back p{
	text-align:center;
}
```

## Q2
``` css
html,body {
	width:100%;
	height:100%;
	margin:0;
	padding:0;
	font-family:Arial, sans-serif;
	font-size:12pt;
}


.container{
	padding-top:50px;
	display:flex;
	justify-content: space-around;
	perspective:1000px;
	perspective-origin:center;
}

.container>.block{
	position:relative;
	flex-basis:200px;
	height:400px;
}

.block>.front, .block>.back{
	position:absolute;
	width:100%;
	height:100%;
	backface-visibility: hidden;
	transition:transform 0.5s ease-in-out;
}

.block>.front{
	background-color:#F6E847;
}

.block>.back{
	background-color:#6FB9A3;
	transform: rotateY(180deg);
}

.front p, .back p{
	text-align:center;
}

.block:hover>.front {
	transform:rotateY(-180deg);
}

.block:hover>.back{
	transform:rotateY(0deg);
}
```