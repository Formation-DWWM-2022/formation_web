const makeString = length => {
    let str = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for ( let i = 0; i < length; i++ ) {
      str += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return str;
}
  
export const fakeUsersGenerator = () => {
    const users = [];
  
    for (let i = 0; i < 10000; i++) {
      users.push({
        id: `${i+1}`,
        name: `${makeString(5)} ${makeString(6)}`,
        username: `${makeString(5)}`,
        email: `${makeString(9)}@gmail.com`,
        address: {
            street: makeString(18),
            suite: makeString(8),
            city: makeString(8),
            zipcode: `${i+1}`
        }
      });
    }
    return users;
}