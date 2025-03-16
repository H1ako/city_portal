const openNewRequestsBtns = document.querySelectorAll("[open-new-requests]");
const newRequestModal = document.querySelector("#new-request-modal");

const loginBtns = document.querySelectorAll("[open-auth-modal]");
const authModal = document.querySelector("#auth-modal");
const authModalNavBtns =
  authModal && authModal.querySelectorAll(".auth-modal__nav button");

const header = document.querySelector(".header");
const userBtn = header.querySelector(".content__user");
const headerUserProfile = header.querySelector(".content__user-profile");

const deleteRequestConfirmModal = document.querySelector(
  "#delete-request-confirm-modal"
);
const deleteRequestConfirmModalBtns =
  deleteRequestConfirmModal &&
  deleteRequestConfirmModal.querySelectorAll("button");
const deleteRequestBtns = document.querySelectorAll("[delete-request]");

const editCategoriesBtn = document.querySelector("[edit-categories]");
const editCategoriesModal = document.querySelector("#edit-categories-modal");

const declineBtns = document.querySelectorAll("[decline-request]");
const declineRequestModal = document.querySelector("#decline-request-modal");

const editBtns = document.querySelectorAll("[edit-request]");
const editRequestModal = document.querySelector("#edit-request-modal");

const loginForm = document.querySelector("#login-form");
const signupForm = document.querySelector("#signup-form");
const logoutBtns = document.querySelectorAll("[logout-btn]");

const newRequestForm = document.querySelector("#new-request-form");

function openModal(modal) {
  if (!modal) return;

  document.body.style.overflowY = "hidden";
  modal.showModal();
}

function closeModal(modal) {
  if (!modal) return;

  document.body.style.overflowY = "auto";
  modal.close();
}

function checkIfOuterClicked(event, element) {
  const elementBox = element.getBoundingClientRect();
  if (event.clientX === 0 && event.clientY === 0) return false;

  return (
    event.clientX < elementBox.left ||
    event.clientX > elementBox.right ||
    event.clientY < elementBox.top ||
    event.clientY > elementBox.bottom
  );
}

function setAuthModalState(state) {
  if (!authModal) return;

  authModal.dataset.state = state;
}

newRequestForm &&
  newRequestForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(newRequestForm);
    const response = await fetch(`${SITE_URL}/api/requests/create`, {
      method: 'POST',
      body: formData
    });
    if (response.ok) {
      const data = await response.json();
      const redirect = data?.redirect
      if (redirect) {
        window.location.href = redirect
      } else {
        window.location.reload()
      }
    } else {
      console.error('Failed to create new request')
    }
    // closeModal(newRequestModal);
  });

logoutBtns.forEach(btn => {
  btn.addEventListener('click', async () => {
    const response = await fetch(`${SITE_URL}/api/auth/logout`, {
      method: 'get'
    })
    if (response.ok) {
      const data = await response.json();
      const redirect = data?.redirect
      if (redirect) {
        window.location.href = redirect
      } else {
        window.location.reload()
      }
    } else {
      console.error('Failed to logout')
    }
  })
})

loginForm &&
  loginForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(loginForm);
    const response = await fetch(`${SITE_URL}/api/auth/signin`, {
      method: 'POST',
      body: formData
    });
    if (response.ok) {
      const data = await response.json();
      const redirect = data?.redirect
      if (redirect) {
        window.location.href = redirect
      } else {
        window.location.reload()
      }
    } else {
      console.error('Failed to login')
    }
    // closeModal(authModal);
  });

signupForm &&
  signupForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(signupForm);
    const response = await fetch(`${SITE_URL}/api/auth/signup`, {
      method: 'POST',
      body: formData
    });
    if (response.ok) {
      const data = await response.json();
      const redirect = data?.redirect
      if (redirect) {
        window.location.href = redirect
      } else {
        window.location.reload()
      }
    } else {
      console.error('Failed to signup')
    }
    // closeModal(authModal);
  });

loginBtns.forEach(btn => {
  btn.addEventListener("click", () => openModal(authModal));
})


authModalNavBtns &&
  authModalNavBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      setAuthModalState(btn.dataset.state);
    });
  });
authModal &&
  authModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, authModal)) {
      closeModal(authModal);
    }
  });

openNewRequestsBtns &&
  openNewRequestsBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      openModal(newRequestModal);
    });
  });
newRequestModal &&
  newRequestModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, newRequestModal)) {
      closeModal(newRequestModal);
    }
  });

setAuthModalState("login");

deleteRequestBtns &&
  deleteRequestBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      openModal(deleteRequestConfirmModal);
    });
  });

deleteRequestConfirmModalBtns &&
  deleteRequestConfirmModalBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      closeModal(deleteRequestConfirmModal);
    });
  });

deleteRequestConfirmModal &&
  deleteRequestConfirmModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, deleteRequestConfirmModal)) {
      closeModal(deleteRequestConfirmModal);
    }
  });

editCategoriesBtn &&
  editCategoriesBtn.addEventListener("click", () => {
    openModal(editCategoriesModal);
  });

editCategoriesModal &&
  editCategoriesModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, editCategoriesModal)) {
      closeModal(editCategoriesModal);
    }
  });

editBtns &&
  editBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      openModal(editRequestModal);
    });
  });

editRequestModal &&
  editRequestModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, editRequestModal)) {
      closeModal(editRequestModal);
    }
  });

declineBtns &&
  declineBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      openModal(declineRequestModal);
    });
  });

declineRequestModal &&
  declineRequestModal.addEventListener("click", (event) => {
    if (checkIfOuterClicked(event, declineRequestModal)) {
      closeModal(declineRequestModal);
    }
  });

  userBtn && userBtn.addEventListener("click", () => {
    headerUserProfile?.classList?.add('active')
  })

  document.body && document.body.addEventListener("click", (event) => {
    if (event.target.closest('.content__user') || event.target.closest('.content__user-profile ')) return

    headerUserProfile?.classList?.remove('active')
  })