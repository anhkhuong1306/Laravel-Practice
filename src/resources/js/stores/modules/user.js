import * as styles from "@/styles";
import { darkModeKey, styleKey } from "@/config";
import axios from "axios";

const state = {
    userName: null,
    userEmail: null,
    userAvatar: null,

    /* Field focus with ctrl+k (to register only once) */
    isFieldFocusRegistered: false,

    /* Sample data (commonly used) */
    clients: [],
    history: [],
};

const actions = {
    setUser(payload) {
        if (payload.name) {
            this.userName = payload.name;
        }
        if (payload.email) {
            this.userEmail = payload.email;
        }
        if (payload.avatar) {
            this.userAvatar = payload.avatar;
        }
    },

    fetch(sampleDataKey) {
        axios
            .get(`data-sources/${sampleDataKey}.json`)
            .then((r) => {
                if (r.data && r.data.data) {
                    this[sampleDataKey] = r.data.data;
                }
            })
            .catch((error) => {
                alert(error.message);
            });
    },
};
export default {
    state,
    actions,
};
