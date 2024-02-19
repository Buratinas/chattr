import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    static values = {
        url: String,
    }

    /** @type {EventSource} */
    #eventSource;

    async initialize() {
        this.#eventSource = new EventSource(this.urlValue);
    }
}
