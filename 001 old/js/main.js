{
  const handleSubmitContForm = e => {
    let _RETURN = true;
    const $form = document.forms["ctf"];
    if (!validateForm($form["name"])) {
      _RETURN = false;
    }
    if (!validateFormEmail($form["email"])) {
      _RETURN = false;
    }
    if (!validateForm($form["message"])) {
      _RETURN = false;
    }
    if (!_RETURN) {
      e.preventDefault();
    }
  }

  const validateFormEmail = $email => {
    if ($email.value === null || $email.value === "") {
      $email.style.background.color = "red";
      $email.style.boxShadow = "0rem 0 1rem red";
      return false;
    } else {
      if (!validateEmail($email.value)) {
        $email.style.background.color = "red";
        $email.style.boxShadow = "0rem 0 1rem red";
        return false;
      } else {
        $email.style.background.color = "#FFF";
        $email.style.boxShadow = "none";
        return true;
      }
    }
  }

  const validateEmail = email => {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  const validateForm = $form => {
    if ($form.value === null || $form.value === "") {
      $form.style.background.color = "red";
      $form.style.boxShadow = "0rem 0 1rem red";
      return false;
    } else {
      $form.style.background.color = "#FFF";
      $form.style.boxShadow = "none";
      return true;
    }
  }

  const init = () => {
    const $contact = document.querySelector(`.subctf`);
    if ($contact) {
      $contact.addEventListener(`click`, handleSubmitContForm);
    }
  }
  init();
}
