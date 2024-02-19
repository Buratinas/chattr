import { Controller } from '@hotwired/stimulus';
import { getComponent}  from "@symfony/ux-live-component";

export default class extends Controller {

    static values = {
        url: String,
    }

    /** @type {EventSource} */
    #eventSource;

    async initialize() {
        this.component = await getComponent(this.element);

        console.log(this.urlValue);

        this.component.on('render:finished', (component) => {
            console.log('render:finished', component)
        })

        this.#eventSource = new EventSource(this.urlValue);
    }
}
