package main

import (
	"os"
    "os/signal"
	
	"github.com/greggailly/pullUp/agent"
	"github.com/robfig/cron/v3"
)

func main() {
	rawUrl := agent.GetFlags();
	url, error := agent.CheckValidRemote(rawUrl);

    if error != nil {
		os.Exit(1)
	}

	c := cron.New()
	c.AddFunc("@every 0h0m20s", func() {agent.Execute(url)})
	go c.Start()

	//Stop only when exited
    sig := make(chan os.Signal)
    signal.Notify(sig, os.Interrupt, os.Kill)
	<-sig
}
