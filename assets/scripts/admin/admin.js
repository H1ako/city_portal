const newCategoryBtns = document.querySelectorAll("[new-category]");
const deleteCategoryBtns = document.querySelectorAll("[delete-category]");

const editBtns = document.querySelectorAll("[edit-request]");
const editRequestModal = document.querySelector("#edit-request-modal");

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

deleteCategoryBtns.forEach((btn) => {
  btn.addEventListener("click", async () => {
    const categoryId = btn.dataset.categoryId;
    const response = await fetch(`${SITE_URL}/api/admin/request-categories/${categoryId}/delete`, {
      method: "DELETE",
      body: JSON.stringify({ csrf: document.querySelector("meta[name=csrf]").content }),
    });

    if (response.ok) {
      btn.closest("li").remove();
    } else {
      console.error("Failed to delete category");
    }
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

deleteRequestBtns &&
  deleteRequestBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      openModal(deleteRequestConfirmModal);
    });
  });
