# SASS
``` css
@mixin forme($size, $color) {
  box-sizing:border-box;
  display:inline-block;
  width:$size;
  height:$size;
  background-color:$color;  
  
  &:hover {
    background-color:lighten($color,30%);
  }
}

@mixin losangeforme {  
  transform:rotate(-45deg) scale(0.7, 0.7);
}

.carre {
  @include forme(50px, #0000ff);
}

.rond {
  @include forme(100px, red);
  border-radius:50%;
}

.losange {
  @include forme(20px, green);
  @include losangeforme;
}
```