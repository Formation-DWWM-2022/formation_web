# Memo SASS

En .sass, dites adieu aux accolades et aux points-virgules ! À la place, elle utilise uniquement des tabulations et des retours à la ligne pour la mise en forme du code.

**Les blocs sont nommés en fonction de leur rôle :**

**Les éléments** indiquent le nom de leur bloc parent, suivi d’un dunder (__) puis du rôle de l’élément : form__label.

**Les modificateurs** utilisent le nom du bloc ou de l’élément qu’ils modifient, suivi de deux tirets (--) et de ce que le sélecteur modifie : button--green.

### Les variables

Les variables vous permettent de stocker des valeurs répétées fréquemment, comme par exemple les couleurs et les mensurations, dans un élément unique que vous pouvez réutiliser à travers l’ensemble de votre code.

```scss
$color-primary: #15DEA5; //je déclare ma variable
.form__heading {
  width: 100%;
  color: #fff;
  text-shadow: 0.55rem 0.55rem #11af82;
  background: $color-primary; //je l'utilise
}
```

Les différents types de variables :

- **les couleurs**
- **les chaînes de caractères (strings)**
- **les nombres**
- **les listes et maps :** des collections de n’importe lesquels des éléments ci-dessus.
- les **booléens (boolean),** les **nulls** et les **fonctions**.

### Les mixins

Plutôt que d’être limités à des valeurs, les mixins stockent des blocs entiers de code.

```scss
@mixin mixin-name {
  css-property: value;
}

//exemple :
@mixin heading-shadow{
  text-shadow: .55rem .55rem #15DEA5;
}
```

Dans le cas présent, nous voulons ajouter une ombre dans notre sélecteur .form__heading, ce que nous faisons en tapant @include suivi d’un espace et du nom de notre mixin :

```scss
.form {
  &__heading {
      @include heading-shadow;
  }
}

// = en css

.form__heading {
  text-shadow: .55rem .55rem #15DEA5;
}
```

Si vous placez des parenthèses après le nom de votre mixin mais avant les accolades, et qu’entre ces parenthèses vous mettez un argument (ou plusieurs), votre mixin devient customisable :

```scss
@mixin heading-shadow($colour){
  text-shadow: .55rem .55rem $colour;
}
```

```scss
.heading{
  &__header {
  @include heading-shadow(#fff);
  }
}
```

Sass remplacera la variable $colour au sein de la mixin avec la valeur de couleur que vous indiquez

Plutôt que de renseigner une valeur de couleur chaque fois que vous utilisez votre mixin heading-shadow, vous pouvez régler la valeur par défaut de l’argument. Si vous décidez de ne pas customiser la couleur de l’ombre, c’est la couleur par défaut qui sera utilisée. Vous pouvez le faire en définissant sa valeur de la même manière que pour une variable déclarée normalement :

```scss
@mixin heading-shadow($colour: $colour-primary){ //je definis la couleur par ma variable existante
  text-shadow: .55rem .55rem $colour;
}
```

### Nesting : Créer une hiérarchie

```scss
.nav {
  padding-right: 6rem;
  flex: 2 1 auto;
  text-align: right;
  .nav__link {
      display: inline;
      font-size: 3rem;
      padding-left: 1.5rem;
      .nav__link--active {
        color: #001534;;
      }
  }
}
```

### Boucles

Les boucles, qui automatisent les tâches répétitives telles que la création d’une série de modificateurs de couleurs, par exemple, vous épargnent un vrai calvaire tout en gardant une codebase plus petite et plus simple à gérer :

```scss
$colours: (
  mint: #15DEA5,
  navy: #001534,
  seafoam: #D6FFF5,
  white: #fff,
  rust: #DB464B
);

@each $colour, $hex in $colours {
  .btn--#{$colour} {
      background-color: $hex;
  }
}
```

### **Les structures conditionnelles (ou conditions)**

Les **opérations logiques** vous permettent d’écrire **un même bloc de code que vous pouvez utiliser dans différentes circonstances** et qui le font réagir en conséquence, comme changer la couleur du texte en fonction de la couleur du fond. Par exemple *si* le fond est bleu foncé, *alors* passer le texte en blanc. Avec le temps, cela vous donne une codebase plus petite, plus concise qui est donc beaucoup plus facile à maintenir.

```scss
@if (lightness(#15DEA5) > 25%) {
  .header {
      color: #fff;
      background-color: $mint;
  }

}@else{
  .header {
  color: #000;
  background-color: $mint;
  } 
}
```

### Les **types de combinateurs**

### **Combinateur parent**

```scss
.parent {
  background-color: #15DEA5;
}
```

### **Combinateur descendant**

```scss
.parent .descendant {
  color: #fff; //si le deuxième élément est le descendant du premier, alors il adoptera la couleur spécifiée
}
```

### **Combinateur parent > enfant**

```scss
.parent > .child {
  color: #D6FFF5; //si le deuxième élément est un enfant du premier, alors il adoptera la couleur spécifiée
}
```

### **Combinateur adjacent**

```scss
.parent + .adjacent {
  color: #001534; //si le deuxième élément est immédiatement précédé du premier, alors il adoptera la couleur spécifiée
}
```

En saas

```scss
.parent {
  background-color: #15DEA5;
  .descendant {
      color: #fff;
  }
  >.child {
      color: #D6FFF5;
  }
  +.adjacent {
      color: #001534;
  }
}
```

### L’esperluette & pour lier un sélecteur imbriqué à un sélecteur parent sans recourir à un combinateur.

```scss
ul {
  list-style: none;
  text-align: right;
      li {
				display: inline;
        font-size: 3rem;
        color: #D6FFF5;
        &:hover {
            color: #001534;
        }
      }
}
```

```scss
.btn {
  display: inline-block;
  margin: 0 auto;
  background: #15DEA5;
  padding: 1rem;
  &--disabled {
      background: grey;
  }

   &--outline {
      background: transparent;
      border: 2px solid #15DEA5;
      &.btn--disabled{

         border: 2px solid grey;
      }
  }
}
```

=

```scss
.btn {
  display: inline-block;
  margin: 0 auto;
  background: #15DEA5;
  padding: 1rem;
}

.btn--disabled {
  background: grey;
}

.btn--outline {
  background: transparent;
  border: 2px solid #15DEA5;
}

.btn--outline.btn--disabled {
  border: 2px solid grey;
}
```

Le code html

```html
<div class="container">
<div class="btn btn--disabled">Solid Button</div>
<div class="btn btn--outline btn--disabled">Outline Button</div>
</div>
```

Résultat

![image](https://tipsly.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F896f8f97-50fd-4fa0-9ca8-6346f4f2afef%2FUntitled.png?table=block&id=1298f92c-10ec-4fe3-9d96-aae553f6b9b9&spaceId=ed8178a7-3f3a-49bd-9ca6-b898a46262d0&width=860&userId=&cache=v2)