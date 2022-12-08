const titleGenerator = length => {
    let str = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    for ( let i = 0; i < length; i++ ) {
      str += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return str;
}

export const fakeArticleGenerator = () => {
    const fakeParagraph = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptates culpa rem fugit pariatur ducimus vitae, quas quia accusamus! Necessitatibus possimus aliquam dolorum explicabo, repellat accusantium illo vel quisquam laudantium! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente voluptates culpa rem fugit pariatur ducimus vitae, quas quia accusamus! Necessitatibus possimus aliquam dolorum explicabo, repellat accusantium illo vel quisquam laudantium!';
      const articles = [];
    
      for (let i = 0; i < 200; i++) {
        articles.push({ 
            id: `${i+1}`, 
            title: titleGenerator(8),
            text: fakeParagraph,
            img: "https://cdn.pixabay.com/photo/2022/07/18/16/46/husky-7330388_1280.jpg"
        });
      }
      return articles;
}