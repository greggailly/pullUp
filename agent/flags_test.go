package agent

import (
	"testing"
	"flag"
)


func TestValidRemote(t *testing.T) {
	var rem = flag.String("remote", "https://test.ctisante.com", "Dummy url")
	remote := *rem

	_, error := checkValidRemote(remote)

	if error != nil {
		t.Errorf("Remote is valid")
	}
}

func TestInvalidRemote(t *testing.T) {
	var rem = flag.String("remote2", "invalidUrl", "Dummy url")
	remote := *rem

	_, error := checkValidRemote(remote)

	if error == nil {
		t.Errorf("Remote is invalid")
	}
}