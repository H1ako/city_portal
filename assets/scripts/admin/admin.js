const newCategoryBtns = document.querySelectorAll("[new-category]");
const deleteCategoryBtns = document.querySelectorAll("[delete-category]");

const editBtns = document.querySelectorAll("[edit-request]");
const editRequestModal = document.querySelector("#edit-request-modal");

const deleteRequestConfirmModal = document.querySelector(
  "#delete-request-confirm-modal"
);
const deleteRequestConfirmModalBtn =
  deleteRequestConfirmModal &&
  deleteRequestConfirmModal.querySelector(".actions__delete");

const deleteRequestDeclineModalBtn =
  deleteRequestConfirmModal &&
  deleteRequestConfirmModal.querySelector(".actions__cancel");

const editCategoriesBtn = document.querySelector("[edit-categories]");
const editCategoriesModal = document.querySelector("#edit-categories-modal");

const declineBtns = document.querySelectorAll("[decline-request]");
const declineRequestModal = document.querySelector("#decline-request-modal");

const deleteRequestBtns = document.querySelectorAll("[delete-request]");
const deleteUserBtns = document.querySelectorAll("[delete-user]");

deleteUserBtns.forEach((btn) => {
  btn.addEventListener("click", async () => {
    const userId = btn.dataset.id;
    const response = await fetch(`${SITE_URL}/api/admin/users/${userId}/delete`, {
      method: "DELETE",
      body: JSON.stringify({
        csrf: document.querySelector("meta[name=csrf]").content
      })
    });

    if (response.ok) {
      btn.closest("li").remove();
    } else {
      console.error("Failed to delete user");
    }
  });
});

editRequestModal &&
  editRequestModal.addEventListener("submit", async (event) => {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const requestId = form.dataset.requestId;

    const response = await fetch(
      `${SITE_URL}/api/admin/requests/${requestId}/edit`,
      {
        method: "post",
        body: formData,
      }
    );

    if (response.ok) {
      closeModal(editRequestModal);
      window.location.reload();
    } else {
      console.error("Failed to edit request");
    }
  });

deleteCategoryBtns.forEach((btn) => {
  btn.addEventListener("click", async () => {
    const categoryId = btn.dataset.categoryId;
    const response = await fetch(
      `${SITE_URL}/api/admin/request-categories/${categoryId}/delete`,
      {
        method: "DELETE",
        body: JSON.stringify({
          csrf: document.querySelector("meta[name=csrf]").content,
        }),
      }
    );

    if (response.ok) {
      btn.closest("li").remove();
    } else {
      console.error("Failed to delete category");
    }
  });
});

deleteRequestConfirmModalBtn &&
  deleteRequestConfirmModalBtn.addEventListener("click", async () => {
    closeModal(deleteRequestConfirmModal);

    const requestId = deleteRequestConfirmModal.dataset.requestId;

    const response = await fetch(
      `${SITE_URL}/api/admin/requests/${requestId}/delete`,
      {
        method: "DELETE",
        body: JSON.stringify({
          csrf: document.querySelector("meta[name=csrf]").content,
        }),
      }
    );

    if (response.ok) {
        window.location.reload();
    } else {
      console.error("Failed to delete request");
    }
  });
deleteRequestDeclineModalBtn &&
  deleteRequestDeclineModalBtn.addEventListener("click", () => {
    closeModal(deleteRequestConfirmModal);
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
      editRequestModal.querySelector("[status-field]").value =
        btn.dataset.status;
      editRequestModal.querySelector("[response-field]").value =
        btn.dataset.response;
      editRequestModal.querySelector("[response-image-field]").src =
        btn.dataset.responseImage;
      editRequestModal.querySelector("form").dataset.requestId = btn.dataset.id;
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

deleteRequestBtns &&
  deleteRequestBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      deleteRequestConfirmModal.dataset.requestId = btn.dataset.id;
      openModal(deleteRequestConfirmModal);
    });
  });
