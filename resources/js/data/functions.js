

const truncateText = (text, contentMaxLength) => {
    if(text.length > contentMaxLength){
        return text.substr(0, contentMaxLength) + ' ...';
    }
    return text;
}

const formateDate = (date) => {
    /* const d = new Date(this.post.date);
     const day = d.getDate() < 10 ? '0'+ d.getDate() : d.getDate();
     const month = (d.getMonth() + 1) < 10 ? '0'+ (d.getMonth() + 1 ) : (d.getMonth() + 1);
     return `${day}/${month}/${d.getFullYear()}`*/

    // return this.post.date.split('-').reverse().join('/');

      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(date).toLocaleDateString('it-IT', options);

 }


export { truncateText, formateDate }
