const timer = 5000

const success = (payload) => {
    cuteToast({
        type: 'success',
        message: payload,
        timer: timer,
    })
}

const info = (payload) => {
    cuteToast({
        type: 'info',
        message: payload,
        timer: timer,
    })
}

const warning = (payload) => {
    cuteToast({
        type: 'warning',
        message: payload,
        timer: timer,
    })
}

const error = (payload) => {
    try {
        const messageObj = JSON.parse(payload)
        const arr = []

        for (let i in messageObj) arr.push(...messageObj[i])

        cuteToast({
            type: 'error',
            message: '<ul>' + arr.map((el) => `<li>${el}</li>`).join('') + '</ul>',
            timer: 8000,
        })
    } catch (e) {
        cuteToast({
            type: 'error',
            message: payload,
            timer: 5000,
        })
    }
}

const errors = (payload) => {
    const messageObj = Object.values(payload)
    const arr = []

    for (let i in messageObj) arr.push(...messageObj[i])

    cuteToast({
        type: 'error',
        message: '<ul>' + arr.map((el) => `<li>${el}</li>`).join('') + '</ul>',
        timer: 8000,
    })
}

export default {
    error,
    errors,
    info,
    success,
    warning,
}
