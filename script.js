const selectBtn = document.getElementById('category');
const blogContainer = document.querySelector('.blog-content');
const addBtn = document.getElementById('add-post');

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
      dropdownSelect.push(
        `<option value="${value.name}">${value.name}</option>`
      );
    }
  }
  selectBtn.innerHTML = dropdownSelect.join('');
};

const posts = async () => {
  const post = [];
  const data = await fetchData('http://restapi.test/api/posts/read.php');
  if (data) {
   for(val of data){
     post.push(`<div class='border mb-5'>
        <h1 class="blog-title text-capitalize fw-bold">${val.title}</h1>
        <p class="blog-text">${val.body}</p>
        <p class="author text-uppercase fw-bold">${val.author}</p>
        <a href="" class="btn">Delete</a>
        <a href="" class="btn">Update</a>
     </div>`);
   }
  }

  blogContainer.innerHTML = post.join('');
};

window.addEventListener('DOMContentLoaded', () => {
  categories();
  posts();
});
