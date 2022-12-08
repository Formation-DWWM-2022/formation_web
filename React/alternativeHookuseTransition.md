# Alternative au hook useTransition

Si vous travaillez sur une ancienne version de React qui ne vous permet pas d'accéder au Hook useTransition, sachez que vous pouvez obtenir une alternative via React.startTransition.

Cette méthode React.startTransition(callback) vous permet de marquer les mises à jour comme des transitions à l'intérieur de la fonction de rappel fournie en tant qu'argument. Cependant, notez que cette méthode est conçue pour être utilisée seulement lorsque React.useTransition n'est pas disponible.

Pour suivre l'état d'attente d'une transition, optez pour React.useTransition que nous avons étudié précédemment. En effet, React.startTransition ne fournit pas d'indicateur isPending.
