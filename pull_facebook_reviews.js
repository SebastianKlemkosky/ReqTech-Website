const accessToken = 'EAAKYP9uj8a4BAHYmlVKBWYIZAAAqiaZC9CtOGiMkkf0aXVor1irNTgCNkYM5IHDzGS8VMKO7D49GDp5cte5ZCgPhqqjIAZBvHAT7ZAPN8GxoUOZAZBLRj8KstZCmOseBdBbfWz9YOTrZAZByZByZBPC9DJ9rgDvM9ZBFJh0WF9GHc9Cl3DZAimupGmHZCvmZCGA7vHZCKAIIbZCSfiON9YwlE73s2F8Hit';
const pageId = '107672455547761';

fetch(`https://graph.facebook.com/v16.0/${pageId}/ratings?fields=review_text,reviewer{name}&access_token=${accessToken}`)
  .then(response => response.json())
  .then(data => {
    const reviews = data.data;
    const reviewContainer = document.querySelector('.carousel');
    
    for (let i = 0; i < reviews.length; i++) {
      const review = reviews[i].review_text;
      const reviewerName = reviews[i].reviewer ? reviews[i].reviewer.name : '- Facebook Review';
      const reviewElement = document.createElement('div');
      reviewElement.classList.add('review');
      reviewElement.innerHTML =   `
      <div class="review">
        <p>${review}</p>
        <div class="author">
          <span class="name">${reviewerName}</span>
        </div>
      </div>
    `;
      reviewContainer.appendChild(reviewElement);
    }
  })
  .catch(error => console.error(error));

