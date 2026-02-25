import gsap from 'gsap';
import pubsub from 'pubsub-js';

export default (() => {
  const form = document.querySelector('#ajax-filter-form');

  
  let pageInput;
  let maxPageInput;
  let loadMoreButton;



  const init = () => {
    console.log(form);
    if (!form) return;

    pageInput = form.querySelector('input[name="page"]');
    maxPageInput = form.querySelector('input[name="maxPage"]');
    loadMoreButton = document.querySelector('#load-more');

    form.addEventListener('change', (event) => {
      if (event.target.type === 'checkbox') {
        handleCheckboxChange(event);
      }
      pageInput.value = 1;
      fetchResults(true);
    });

    // Pagination click
    console.log('ok');
    document.addEventListener('click', (e) => {
      console.log(e.target.closest('#load-more'), e.target);
      if (e.target.closest('#load-more')) {
        e.preventDefault();
        pageInput.value++;
        fetchResults(false);
      }
    });
  };

  const updatePaginationVisibility = (maxPage, currentPage) => {
    console.log(maxPage, currentPage)
    if (maxPage <= currentPage) {
      gsap.to(loadMoreButton, {autoAlpha : 0});
    } else {
      gsap.to(loadMoreButton, {autoAlpha : 1});
    }
  };

  const fetchResults = (filter = false) => {
    const formData = new FormData(form);
    const params = new URLSearchParams(formData).toString();

    fetch(`${form.action}?${params}`, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
      },
    })
      .then(response => response.text())
      .then(html => {
        const parser = new DOMParser();
        const responseDoc = parser.parseFromString(html, 'text/html');
        const maxPage = responseDoc.querySelector('#ajax-filter-form input[name="maxPage"]').value;
        maxPageInput.value = maxPage;
        updatePaginationVisibility(maxPage, pageInput.value);

        if (filter) {
          handleFilteredResults(responseDoc);
        } else {
          handleLoadMoreResults(responseDoc);
        }
      });
  };

  const handleFilteredResults = (responseDoc) => {
    const oldPosts = document.querySelectorAll('#ajax-posts-container .ajax-card');
    gsap.to(oldPosts, {
      duration: 0.3,
      opacity: 0,
      onComplete: () => {
        oldPosts.forEach(post => post.remove());
        const newPosts = responseDoc.querySelector('#ajax-posts-container').children;
        appendNewPosts(newPosts);
      },
    });
  };

  const handleLoadMoreResults = (responseDoc) => {
    const newPosts = responseDoc.querySelector('#ajax-posts-container').children;
    appendNewPosts(newPosts, true);
  };

  const appendNewPosts = (newPosts, isLoadMore = false) => {
    const target = document.querySelector('#ajax-posts-container');

    for (const post of newPosts) {
      isLoadMore ? post.classList.add('new') : '' ;
      target.appendChild(post.cloneNode(true));
    }

    animateNewPosts(isLoadMore);
  };

  const animateNewPosts = (isLoadMore) => {
    const newPosts = document.querySelectorAll('#ajax-posts-container .ajax-card' + (isLoadMore ? '.new' : ''));
    const newPostsPicture = document.querySelectorAll('#ajax-posts-container .ajax-card' + (isLoadMore ? '.new' : '') + ' .card-picture');
    
    pubsub.publish('cursor:refresh', newPosts);
    
    gsap.from(newPosts, {
      duration: 1,
      opacity: 0,
      y: -150,
      transformOrigin: 'center',
      stagger: 0.025,
      ease: 'power3.inOut',
    });

    gsap.from(newPostsPicture, {
      duration: 1,
      y: 100,
      scale: 1.2,
      transformOrigin: 'center',
      stagger: 0.025,
      ease: 'power3.inOut',
      onComplete: () => {
        if (isLoadMore) {
          newPosts.forEach(post => post.classList.remove('new'));
        }
      },
    });
  };

  const handleCheckboxChange = (event) => {
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    const wasChecked = event.target.checked;

    checkboxes.forEach((checkbox) => {
      checkbox.checked = false;
      checkbox.parentNode.classList.remove('active');
    });

    if (wasChecked) {
      event.target.checked = true;
      event.target.parentNode.classList.add('active');
    }
  };

  return {
    init,
  };
})();
