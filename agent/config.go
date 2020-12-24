package agent

import (
	"net/http"
    "io/ioutil"
    "strconv"

    "encoding/json"
)

type ConfigResponse struct {
    Repo string `json:"repo"`
    Updates string `json:"updates"`
    Offset string `json:"offset"`
}

func getConfig(url string) (string, string){
	resp, error := http.Get(url + "config")
	CheckIfError(error)
	if error == nil {
		defer resp.Body.Close()

		body, error := ioutil.ReadAll(resp.Body)
		CheckIfError(error)
		
		status := strconv.Itoa(resp.StatusCode)
		
		//sb := string(body)
		var s = new(ConfigResponse)
		err := json.Unmarshal(body, &s)
		CheckIfError(err)
	
		return status, s.Repo
	}
	return "500", ""
}
