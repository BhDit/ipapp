/**
 * HypeForm helper class. Used to set common properties on all forms.
 */
window.Form = class Form {

    constructor(data) {
        this.originalData = data;
        $.extend(this, data);

        /**
         * Create the form error helper instance.
         */
        this.errors = new FormErrors();
        this.busy = false;
        this.successful = false;
    }

    /**
     * Start processing the form.
     */
    startProcessing() {
        this.errors.forget();
        this.busy = true;
        this.successful = false;
    }

    /**
     * Finish processing the form.
     */
    finishProcessing() {
        this.busy = false;
        this.successful = true;
    }

    /**
     * Reset the errors and other state for the form.
     */
    resetStatus() {
        this.errors.forget();
        this.busy = false;
        this.successful = false;
    }


    /**
     * Set the errors on the form.
     */
    setErrors(errors) {
        this.busy = false;
        this.errors.set(errors);
    }

    reset(){
        for (let field in this.originalData) {
            if(this.hasOwnProperty(field)){
                this[field] = this.originalData[field];
            }
        }

        this.errors.forget();
    }
};