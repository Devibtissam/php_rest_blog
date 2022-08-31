const selectBtn = document.getElementById('category');
const blogContainer = document.querySelector('.blog-content');

// fetch data
const fetchData = async (url) => {
  const response = await fetch(url);
  if (response) {
    return response.json();
  }
  return response;
};

const categories = async () => {
  const dropdownSelect = [];
  const data = await fetchData('http://restapi.test/api/categories/read.php');
  if (data) {
    for (value of data) {
      dropdownSelect.push(`<option value="${value.id}">${value.name}</option>`);
    }
  }
  selectBtn.innerHTML = dropdownSelect.join('');
};

const posts = async () => {
  const post = [];
  const data = await fetchData('http://restapi.test/api/posts/read.php');
  if (data) {
    for (val of data) {
      post.push(`<div class='border mb-5'>
        <h1 class="blog-title text-capitalize fw-bold">${val.title}</h1>
        <p class="blog-text">${val.body}</p>
        <p class="author text-uppercase fw-bold">${val.author}</p>
        <button class="btn delete-btn" data-id="${val.id}">Delete</button>
     </div>`);
    }
  }
  blogContainer.innerHTML = post.join('');
  const btns = [...document.querySelectorAll('.delete-btn')];
  btns.forEach(btn => {
    btn.addEventListener('click', (e)=>{
       id= e.target.dataset.id;
       (async () => {
         const rawResponse = await fetch(
           `http://restapi.test/api/posts/delete.php?id=${id}`,
           {
             method: 'GET',
             headers: {
               Accept: 'application/json',
               'Content-Type': 'application/json',
             }
            });
         posts();
       })();
    })
  })
};

window.addEventListener('DOMContentLoaded', () => {
  categories();
  posts();
});
