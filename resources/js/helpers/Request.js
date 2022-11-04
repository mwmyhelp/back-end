
export const api = axios.create({
    baseURL: process.env.MIX_API_URL,
    timeout: 60000
});

export const get_files_url = process.env.MIX_GET_FILES_URL;
export const download_files_url = process.env.MIX_DOWNLOAD_FILES_URL;
