const selectBtn = document.getElementById('category');

// fetch data
const fetchData = async (url) => {
  const response = await fetch(url);
  if (response) {
    return response.json();
  }
  return response;
};

(async () => {
  const dropdownSelect = [];
  const data = await fetchData('http://restapi.test/api/categories/read.php');
  if (data) {
    for (value of data) {
      dropdownSelect.push(`<option value="${value.id}">${value.name}</option>`);
    }
  }
  selectBtn.innerHTML = dropdownSelect.join('');
})();

// add new Post
const addBtn = document.querySelector('button');
addBtn.addEventListener('click', () => {
  const title = document.querySelector('input[name=title]').value;
  const author = document.querySelector('input[name=author]').value;
  const category_id = selectBtn.value;
  const category_name = selectBtn.options[selectBtn.selectedIndex].text;
  const body = document.querySelector('textarea').value;
  const data = {
    title: title,
    autohr: author,
    category_id: category_id,
    category_name: category_name,
    body: body,
  };
  console.log(JSON.stringify(data));

  (async () => {
    const rawResponse = await fetch(
      'http://restapi.test/api/posts/create.php',
      {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      }
    );

  })();
});
