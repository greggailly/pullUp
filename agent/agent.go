package agent

import (
    "os"
    "github.com/go-git/go-git/v5"
)

func Execute(url string){
    
    status, repo := getConfig(url)

    if status == "500" {
        return
    }

    path := "./repo"
    if _, err := os.Stat(path); os.IsNotExist(err) {
        _, err := git.PlainClone(path, false, &git.CloneOptions{
            URL: repo,
            Progress: os.Stdout,
        })
        CheckIfError(err)
    } else {
        // We instance a new repository targeting the given path (the .git folder)
        r, err := git.PlainOpen(path)
        CheckIfError(err)

        // Get the working directory for the repository
        w, err := r.Worktree()
        // Pull the latest changes from the origin remote and merge into the current branch
        Info("git pull origin")
        err = w.Pull(&git.PullOptions{RemoteName: "origin"})

        if (err != nil && err.Error() == "already up-to-date") {
            Info(err.Error())
        } else {
            CheckIfError(err)
        }
    }
    
}