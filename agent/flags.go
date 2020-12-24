package agent

import (
	"flag"
	"errors"
	"net/url"
)

func GetFlags() string {

	urlParam := flag.String("remote", "https://127.0.0.1:8001/", "URL on hwich to check for updates")
	
    flag.Parse()
    
    return *urlParam
}

func CheckValidRemote(rem string) (string, error) {
    u, error := url.ParseRequestURI(rem)
    if error != nil {
        return "", errors.New("Invalid URL")
    }
    return u.String(), nil 
}